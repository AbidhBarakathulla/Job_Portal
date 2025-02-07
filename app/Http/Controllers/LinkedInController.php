<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class LinkedInController extends Controller
{
    // Method to redirect to LinkedIn for authentication
    public function redirect()
    {
        return Socialite::driver('linkedin-openid')
            ->redirect();
    }
    
    // Callback method after successful LinkedIn authentication
    public function callback()
    {
        // Retrieve the authenticated LinkedIn user
        $linkedinUser = Socialite::driver('linkedin-openid')->user();

        // Create or update the user based on LinkedIn ID
        $user = User::updateOrCreate(
            ['linkedin_id' => $linkedinUser->id],
            [
                'name' => $linkedinUser->name,
                'email' => $linkedinUser->email,
                'password' => Hash::make(12345),  // Default password or implement user-specific logic
            ]
        );

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard
        return redirect('/dashboard');
    }

    // Method to post on LinkedIn
        public function postToLinkedIn(Request $request)
        {
            // Retrieve the LinkedIn access token from the session (ensure it's stored after login)
            $accessToken = "AQXWyWjl4gmn0wIaPAEzj1_pGxyCrRgNvL4KMJNK8fozkmmc7nTYpUGtHNlPQVCkkgaeWRw0F7tIAik-YkYItH3gPX5rwnEsEtgxW1gbqEIofuNMiRf3qbUOeVISWNKGT9eTfBKWZPbCToZDHmyeDeKgoRgUCeSx9cNAkiigjoIV1azEqFVbf5h8csL4uXBtijNh5vwki6NXcSk3wv6WHTpuFKmmtjBgwrXEgrgNYIti1telZ7E8KBfvNOeF3x_EBJ5DEXV8uo5UaRqUzhgXUi8JtmRXjnRtTcUwiR48-aMGSW6Kng5x1KIkJf2trYsyu0PFV9Azq2hgfwrVnhfPoEy1yULDgg";
            
            // If the token is not found, prompt the user to authenticate again
            if (!$accessToken) {
                return redirect('/dashboard')->with('error', 'No access token found. Please authenticate again.');
            }
            // Call the postOnLinkedIn method with the token
            return $this->postOnLinkedIn($accessToken,$request);
        }

        // Method to actually make the post on LinkedIn
        public function postOnLinkedIn($accessToken,Request $request)
        {
            // Ensure the access token is provided as a parameter
            if (empty($accessToken)) {
                return redirect('/dashboard')->with('error', 'No access token found. Please authenticate again.');
            }

            // Define the post content
            $postContent = [
                'author' => 'urn:li:person:' . Auth::user()->linkedin_id,  // Use the user's LinkedIn ID to identify the author
                'lifecycleState' => 'PUBLISHED',  // The post will be published
                'specificContent' => [
                    'com.linkedin.ugc.ShareContent' => [
                        'shareCommentary' => [
                            'text' => $request->postinput,  // Content of the post
                        ],
                        'shareMediaCategory' => 'NONE',  // No media attached
                    ],
                ],
                'visibility' => [
                    'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC',  // Make the post visible to everyone
                ],
            ];

            // Send the POST request to LinkedIn API to create a post
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accessToken,  // Use the OAuth token to authorize the request
                    'X-Restli-Protocol-Version' => '2.0.0',  // Required by LinkedIn API
                ])->post('https://api.linkedin.com/v2/ugcPosts', $postContent);

                // Check if the post was successful
                if ($response->successful()) {
                    return redirect('/dashboard')->with('success', 'Your post has been successfully shared on LinkedIn!');
                }

                // If the post was not successful, show the error message from LinkedIn
                return redirect('/dashboard')->with('error', 'Failed to post on LinkedIn: ' . $response->json()['message']);
            
            } catch (\Exception $e) {
                // Handle any exceptions
                return redirect('/dashboard')->with('error', 'An error occurred: ' . $e->getMessage());
            }
        }
}


