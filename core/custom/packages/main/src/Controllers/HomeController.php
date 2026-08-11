<?php namespace EvolutionCMS\Main\Controllers;

use Seiger\sLang\Models\sLangContent;

class HomeController extends BaseController
{
    public function render()
    {
        parent::render();

        $articles = sLangContent::langAndTvs(evo()->getLocae(),['image'])->whereParent(2)->active()->addSelect('site_content.publishedon')->orderByDesc('publishedon')->cursorPaginate(5);
        $this->data['test'] = 'test';
        $this->data['articles'] = $articles;

        $this->data['previousPageUrl'] = $articles->previousPageUrl() ?? null;
        $this->data['nextPageUrl'] = $articles->nextPageUrl() ?? null;

        $populars = sLangContent::langAndTvs(evo()->getLocae(),['image','tv_views'])->whereParent(2)->active()->addSelect('site_content.publishedon')->orderByDesc('tv_views')->limit(6)->get();
        $this->data['populars'] = $populars;
    }
}