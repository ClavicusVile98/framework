<?php


namespace Service\SocialNetwork;


class SocialAdapter implements ISocialAdapter
{
    public function getAdapter(string $socialNetwork, string $courseName): void
    {
        switch ($socialNetwork) {
            case ISocialNetwork::SOCIAL_NETWORK_VK:
                $socialNetworkAdapter = (new VKAdapter())->send($courseName);
                break;

            case ISocialNetwork::SOCIAL_NETWORK_FACEBOOK:
                $socialNetworkAdapter = (new FacebookAdapter())->send($courseName);
                break;

            default:
                $socialNetworkAdapter = (new VKAdapter())->send($courseName);
        }
    }
}