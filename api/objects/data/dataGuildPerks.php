<?php


class dataGuildPerks extends object_base
{

    public $perks;

    public function __construct(array $response_object)
    {
        foreach ($response_object['perks'] as $k => $v)
        {
            $this->perks[$v['guildLevel']] = $v;
        }
    }

    public function getPerkByGuildLevel($level)
    {
        return $this->perks[$level];
    }

}
