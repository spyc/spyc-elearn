<?php

namespace App\Http\Requests;

use App\Http\Controllers\BugController;

class BugReportRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $levels = BugController::getLevels();
        $levels = implode(',', $levels);
        return [
            'title' => 'required|max:64',
            'level' => 'required|in:' . $levels,
            'page' => 'required'
        ];
    }
}
