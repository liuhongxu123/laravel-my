<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function storeComment()
    {
    	$data = [
    		[
    			"comment_id" => 12,
    			"store_id" => 14，
    			"store_img" => "1.jpg",
    			"store_name" => "星巴克",
    			""
    		]
    	];
    }
}
