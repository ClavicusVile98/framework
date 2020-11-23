<?php

declare(strict_types = 1);

namespace Service\SocialNetwork;

interface ISocialNetwork
{
    public const SOCIAL_NETWORK_VK = 'Vkontakte';
    public const SOCIAL_NETWORK_FACEBOOK = 'Facebook';

    public function create(string $socialNetwork, string $courseName): void;
}
