<?php
/**
 * Created by PhpStorm.
 * User: Dexploitdm
 * Date: 28.05.2018
 * Time: 0:33
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class MenusRequest extends Request
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
        return [
            'title' => 'required|max:255'
        ];
    }
}