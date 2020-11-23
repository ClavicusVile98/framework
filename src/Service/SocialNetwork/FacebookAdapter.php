<?php


namespace Service\SocialNetwork;


class FacebookAdapter
{
    public function send(string $courseName): string
    {
        return 'Message for Facebook profile'.$courseName;
    }
}