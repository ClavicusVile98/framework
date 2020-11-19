<?php


namespace Service\SocialNetwork;


class FacebookAdapter implements ISocialAdapter
{
    public function send(string $message): void {    }

    public function getAdapter(string $socialNetwork): ISocialNetwork
    {
        return $socialNetworkAdapter;
    }
}