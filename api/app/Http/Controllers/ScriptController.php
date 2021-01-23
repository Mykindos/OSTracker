<?php

namespace App\Http\Controllers;

use App\BotExperience;
use App\BotItem;
use App\BotLog;
use App\BotRuntime;
use App\BotUser;
use App\Item;
use App\ItemStatus;
use App\Skill;
use Illuminate\Http\Request;

class ScriptController extends Controller
{

    private function getUserID(Request $request): string
    {
        return BotUser::where('username', '=', $request->user)->first()['id'];
    }


    public function submitLog(Request $request)
    {

        $botlog = new BotLog();
        $botlog->scriptID = $request->scriptID;
        $botlog->botUserID = $this->getUserID($request);
        $botlog->version = $request->version;
        $botlog->mirror = $request->mirror;
        $botlog->log = $request->log;

        $botlog->save();

        return response(['message' => "Log saved for {$request->user}"]);

    }

    public function submitRuntime(Request $request)
    {

        $botRuntime = new BotRuntime();
        $botRuntime->scriptID = $request->scriptID;
        $botRuntime->botUserID = $this->getUserID($request);
        $botRuntime->version = $request->version;
        $botRuntime->duration = $request->duration;

        $botRuntime->save();

        return response(['message' => "Runtime saved for {$request->user}"]);
    }

    public function submitExperience(Request $request)
    {

        $skill = Skill::where('skillName', '=', $request->skill)->first();

        if (empty($skill)) {
            return response(['message' => 'Could not find a skill matching this name']);
        }

        $botExperience = new BotExperience();
        $botExperience->scriptID = $request->scriptID;
        $botExperience->botUserID = $this->getUserID($request);
        $botExperience->skillID = $skill['id'];
        $botExperience->exp = $request->exp;

        $botExperience->save();

        return response(['message' => "Experience saved for {$request->user}"]);

    }

    public function submitItems(Request $request)
    {
        if (empty($request->item)) {
            return response(['message' => 'You must provide an item name.']);
        }

        $item = Item::firstOrCreate(['itemName' => $request->item]);

        $itemStatus = ItemStatus::where('status', '=', $request->status)->first();

        if (empty($itemStatus)) {
            return response(['message' => 'Invalid item status.']);
        }

        $botItem = new BotItem();
        $botItem->scriptID = $request->scriptID;
        $botItem->botUserID = $this->getUserID($request);
        $botItem->itemID = $item['id'];
        $botItem->amount = $request->amount;
        $botItem->itemStatusID = $itemStatus['id'];

        $botItem->save();

        return response(['message' => "Item saved for {$request->user}"]);

    }
}
