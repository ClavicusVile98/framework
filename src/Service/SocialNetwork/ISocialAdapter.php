<?php


namespace Service\SocialNetwork;


interface ISocialAdapter
{
    public function getAdapter(string $socialNetwork, string $courseName): void;
}