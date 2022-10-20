<?php

namespace App\Http\Controllers;

use App\Helpers\ExceptionHelper;
use App\Models\Article;
use App\Models\CategoryArticle;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function register(Request $request)
    {
        try {

            $body = $request->all();

            $validate = Validator::make($body, [
                "name" => "required",
                "description" => "required"
            ]);

            if ($validate->fails()) {
                throw new Exception($validate->errors(), 403);
            }

            $article = new article();

            $article->name = $body["name"];
            $article->description = $body["description"];
            $article->status = false;
            $article->save();

            return $article;

        } catch (Exception $e) {
            return ExceptionHelper::show($e);
        }
    }

    public function getArticles(Request $request)
    {
        try {

            $params = (object) $request->input();

            $pName = $request->exists("name") ? $params->name : "";
            $pDescription = $request->exists("description") ? $params->description : "";

            $articles = Article::where(
                [
                    ['name', 'like', "%{$pName}%"],
                    ['description', 'like', "%{$pDescription}%"]
                ])
                ->get();

            foreach ($articles as $article) {
                $article->categories = $article->categories;
            }

            return response()->json($articles);

        } catch (Exception $e) {
            return ExceptionHelper::show($e);
        }
    }
}
