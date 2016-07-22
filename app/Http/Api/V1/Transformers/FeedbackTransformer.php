<?php

namespace App\Http\Api\V1\Transformers;

use App\Http\Api\V1\Model\Feedback;
use Illuminate\Http\Request;

use App\Http\Requests;
use League\Fractal\TransformerAbstract;

class FeedbackTransformer extends TransformerAbstract
{
    public function transform(Feedback $feedback)
    {
        return [
            'contact' => $feedback->contact,
            'content' => $feedback->content,
        ];
    }
}