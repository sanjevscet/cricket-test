<?php

namespace App\Library;


class Constants {
    const LoginFailed = 'Login Failed';
    const LoginSucceed = 'Login Successful';
    const InvalidCredentials = 'Invalid username or password';
    const InvalidRequest = 'The given details are invalid';
    const Errors = 'Unable to get entity by Id';

    # team
    const TeamCreated = 'Team is created successfully';
    const TeamUpdated = 'Team is updated successfully';

    #player
    const PlayerCreated = 'Player is created successfully';
    const PlayerUpdated = 'Player is updated successfully';

    const ItemNotFound = 'Unable to get entity by Id';
    const InvalidId = 'Invalid Id';
    const SuccessfullyFetched = 'Entity found successfully';
    // const TeamFind = 'Team is update successfully';
}