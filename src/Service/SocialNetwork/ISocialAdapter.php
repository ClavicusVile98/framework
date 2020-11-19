<?php


namespace Service\SocialNetwork;


interface ISocialAdapter
{
    public function getAdapter(string $socialNetwork): ISocialNetwork;
    public function send(string $message): void;
}