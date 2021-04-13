<?php

namespace App\Http\Controllers;

use App\New;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Galleries;
use App\Models\Backgrounds;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $background = Backgrounds::where('page','news')->get();
        $content = array(
            'news' => News::where('show', TRUE)->orderBy('menuh_id', 'desc')->paginate(5),
            'bg' => $background
        );
        $pagecontent = view('public.contents.news',$content);

        $pagemain = array(
            'title' => trans('app.News'),
            'description' => 'news',
            'menu' => 'news',
            'pagecontent' => $pagecontent,
        );

        return view('public.masterpage', $pagemain);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($news_slug)
    {
        // $newsRandom = News::inRandomOrder()->paginate(3);
        
        $background = Backgrounds::where('page','news')->get();
        $news = News::whereSlug($news_slug)->first();
        if(count($news) == 0) {
            return abort('News not found', 404);
        }

        $newsRandom = $this->related($news->menuh_id);

        $galeri = Galleries::where('section_type', 'news')->where('section_id', $news->menuh_id)->get();

        $content = array(
            'news' => $news,
            'newsRandoms' => $newsRandom,
            'galeries' => $galeri,
            'bg' => $background
        );

        $pagecontent = view('public.contents.detail_news', $content);

        $pagemain = array(
            'title' => trans('app.Detailnews'),
            'description' => 'detail-news',
            'menu' => 'detail-news',
            'pagecontent' => $pagecontent,
        );

        return view('public.masterpage', $pagemain);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function show(New $new)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function edit(New $new)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, New $new)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(New $new)
    {
        //
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Galleries;
use App\Models\Backgrounds;
use DB;

class NewsController extends Controller
{
    public function index()
    {
        $background = Backgrounds::where('page','news')->get();
        $content = array(
            'news' => News::where('show', TRUE)->orderBy('idnews', 'desc')->paginate(5),
            'bg' => $background
        );
        $pagecontent = view('public.contents.news',$content);

        $pagemain = array(
            'title' => trans('app.News'),
            'description' => 'news',
            'menu' => 'news',
            'pagecontent' => $pagecontent,
        );

        return view('public.masterpage', $pagemain);
    }

    public function detail($news_slug)
    {
        // $newsRandom = News::inRandomOrder()->paginate(3);
        
        $background = Backgrounds::where('page','news')->get();
        $news = News::whereSlug($news_slug)->first();
        if(count($news) == 0) {
            return abort('News not found', 404);
        }

        $newsRandom = $this->related($news->idnews);

        $galeri = Galleries::where('section_type', 'news')->where('section_id', $news->idnews)->get();

        $content = array(
            'news' => $news,
            'newsRandoms' => $newsRandom,
            'galeries' => $galeri,
            'bg' => $background
        );

        $pagecontent = view('public.contents.detail_news', $content);

        $pagemain = array(
            'title' => trans('app.Detailnews'),
            'description' => 'detail-news',
            'menu' => 'detail-news',
            'pagecontent' => $pagecontent,
        );

        return view('public.masterpage', $pagemain);   
    }
    protected function related($idnews)
    {
        $news = News::find($idnews); 
        $result = array();
        $nwsdata = explode('-', $news->slug);

        //search by slug
        $related = News::where(function ($where) use ($nwsdata) {
                foreach ($nwsdata as $tk => $kw) {
                    if(!is_numeric($kw)) {
                        if($tk == 0) {
                            $where->where('title_id','LIKE','%'.$kw.'%');
                        }
                        else {
                            $where->orWhere('title_id','LIKE','%'.$kw.'%');
                        }
                    }
                }
            })
            ->where('idnews','!=',$news->idnews)
            ->limit(3)
            ->get();
        foreach ($related as $rel) {
            $result[] = $rel;
        }
        if(count($result) >= 3) {
            return $result;
        }

        //random search
        $related2 = News::where('idnews','!=',$news->idnews)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        foreach ($related2 as $rel2) {
            $result[] = $rel2;
            if(count($result) >= 3) break;
        }
        return $result;
    }

}
