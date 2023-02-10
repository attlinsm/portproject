<?php

namespace App\Http\Controllers\OpenAI;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\OpenAIControllerRequest;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function ask(OpenAIControllerRequest $request)
    {
        $validated = $request->validated();

        $response = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $validated['question'],
            'max_tokens' => 400,
            'temperature' => 0.1,
        ]);

        return view('admin.openai.result', compact('response'));
    }

}
