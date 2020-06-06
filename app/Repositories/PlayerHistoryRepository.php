<?php

namespace App\Repositories;

use App\PlayerHistory;

use Illuminate\Container\Container as Application;
use App\Library\BaseResponseModel;
use App\Library\Constants;

class PlayerHistoryRepository extends BaseRepository
{

    private $playerRepository;
    public function __construct(Application $app, PlayerRepository $playerRepository)
    {
        parent::__construct($app);
        $this->playerRepository = $playerRepository;
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return PlayerHistory::class;
    }

    public function createOrUpdate($request) {
        $player = $this->playerRepository->show($request->input('player_id'));
        $playerDetails = $player->getData();
        if(!$playerDetails->data) {
            $errors = ['invalid_entity' => Constants::Errors];

            return BaseResponseModel::response('', null, $errors, false);
        }
        $condition = ['player_id' => $request->input('player_id')];
        return parent::updateOrCreate($request, $condition);


        // dd($player);
        // dd($request);
    }
}
