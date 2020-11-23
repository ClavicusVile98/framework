<?php

declare(strict_types = 1);

namespace Service\SocialNetwork;

class SocialNetwork implements ISocialNetwork
{
    /**
     * Определение класса соц.сети
     *
     * @param string $socialNetwork
     * @param string $courseName
     *
     * @return void
     */
    public function create(string $socialNetwork, string $courseName): void
    {
        $this->newAdapter()->getAdapter($socialNetwork, $courseName);
    }

    /**
     * Фабричный метод
     *
     * @return SocialAdapter
     */
    private function newAdapter() : SocialAdapter
    {
        return new SocialAdapter();
    }
}
