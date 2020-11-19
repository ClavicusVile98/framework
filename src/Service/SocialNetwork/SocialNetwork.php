<?php

declare(strict_types = 1);

namespace Service\SocialNetwork;

class SocialNetwork
{
    /**
     * Получение класса соц.сети
     *
     * @param string $socialNetwork
     * @param string $courseName
     *
     * @return void
     */
    public function create(string $socialNetwork, string $courseName): void
    {
        $adapter = (new SocialAdapter())->getAdapter($socialNetwork);
        $this->sendMessage($adapter, $courseName);
    }

    /**
     * Отправка сообщения в соц.сеть
     *
     * @param ISocialAdapter $socialAdapter
     * @param string $courseName
     *
     * @return void
     */
    protected function sendMessage(ISocialAdapter $socialAdapter, string $courseName): void
    {
        $socialAdapter->send('Интересный ' . $courseName . ' курс');
    }
}
