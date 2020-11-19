<?php


namespace Service\SocialNetwork;


class VKAdapter implements ISocialAdapter
{
    public function send(string $message): void {    }

    public function getAdapter(string $socialNetwork): ISocialNetwork
    {
        return $socialNetworkAdapter;
    }
}