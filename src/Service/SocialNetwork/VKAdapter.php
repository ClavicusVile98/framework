<?php


namespace Service\SocialNetwork;


class VKAdapter
{
    public function send(string $courseName): string
    {
        return 'Message for VK profile'.$courseName;
    }
}