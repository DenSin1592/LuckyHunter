<?php
namespace App\Entity;

class Player
{
    private const PLAY_PLAY_STATUS = 'play';
    private const BENCH_PLAY_STATUS = 'bench';

    private int $number;
    private string $name;
    private string $playStatus;
    private int $inMinute;
    private int $outMinute;
    private int $goal;
    private int $redCart;
    private int $yellowCart;
    private string $position;

    public function __construct(int $number, string $name, string $position)
    {
        $this->number = $number;
        $this->name = $name;
        $this->playStatus = self::BENCH_PLAY_STATUS;
        $this->inMinute = 0;
        $this->outMinute = 0;
        $this->goal = 0;
        $this->redCart = 0;
        $this->yellowCart = 0;
        $this->position = $position;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInMinute(): int
    {
        return $this->inMinute;
    }

    public function getOutMinute(): int
    {
        return $this->outMinute;
    }

    public function isPlay(): bool
    {
        return $this->playStatus === self::PLAY_PLAY_STATUS;
    }

    public function getPlayTime(): int
    {
        if(!$this->outMinute) {
            return 0;
        }

        return $this->outMinute - $this->inMinute +1;
    }

    public function goToPlay(int $minute): void
    {
        $this->inMinute = $minute;
        $this->playStatus = self::PLAY_PLAY_STATUS;
    }

    public function goToBench(int $minute): void
    {
        $this->outMinute = $minute;
        $this->playStatus = self::BENCH_PLAY_STATUS;
    }

    public function AddGoal():void
    {
        $this->goal++;
    }

    public function getGoal(): int
    {
        return $this->goal;
    }

    public function AddRedCard():void
    {
        $this->redCart++;
    }

    public function getRedCard(): int
    {
        return $this->redCart;
    }

    public function AddYellowCard():void
    {
        $this->yellowCart++;
    }

    public function getYellowCard(): int
    {
        return $this->yellowCart;
    }

    public function getPosition(): string
    {
        return $this->position;
    }
}