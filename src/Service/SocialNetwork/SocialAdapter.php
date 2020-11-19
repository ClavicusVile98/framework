<?php


namespace Service\SocialNetwork;


class SocialAdapter implements ISocialAdapter
{
    public function __construct()
    {
       // пока не знаю, что тут
    }

   public function getAdapter(string $socialNetwork): ISocialAdapter
    {
        switch ($socialNetwork) {
            case ISocialNetwork::SOCIAL_NETWORK_VK:
                $socialNetworkAdapter = new VKAdapter();
                break;

            case ISocialNetwork::SOCIAL_NETWORK_FACEBOOK:
                $socialNetworkAdapter = new FacebookAdapter();
                break;

            default:
                $socialNetworkAdapter = new VKAdapter();
        }

        return $socialNetworkAdapter;
    }

    public function send(string $message): void
    {
        // TODO: Implement send() method.
    }
}