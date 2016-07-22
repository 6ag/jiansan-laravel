<?php

namespace App\Http\Api\V1\Controllers;

use App\Http\Api\V1\Model\Feedback;
use App\Http\Api\V1\Transformers\FeedbackTransformer;
use App\Http\ApiHelper;
use Illuminate\Http\Request;

use App\Http\Requests;

class FeedbackController extends BaseController
{
    /**
     * @api {post} /feedback 提交反馈信息
     * @apiVersion 0.0.1
     * @apiName feedback
     * @apiGroup Api
     *
     * @apiSuccess {String} contact 联系方式
     * @apiSuccess {String} content 反馈内容
     *
     * @apiSuccessExample 成功响应:
     *   {
     *       "data": {
     *           "contact":"44334512",
     *           "content":"提交一个测试反馈信息"
     *        },
     *       "meta": {
     *           "status": "success",
     *           "status_code": 200,
     *           "message": "提交反馈信息成功"
     *       }
     *   }
     * @apiErrorExample 失败响应:
     *   {
     *       "message": "提交反馈信息失败",
     *       "status_code": 404
     *   }
     */
    public function submitFeedback(Request $request)
    {
        $feedback = Feedback::create($request->only(['contact', 'content']));
        if ($feedback) {
            return $this->response->item($feedback, new FeedbackTransformer())->setMeta(ApiHelper::metaArray('提交反馈信息成功'));
        } else {
            return $this->response->error('提交反馈信息失败', 404);
        }
    }
}
