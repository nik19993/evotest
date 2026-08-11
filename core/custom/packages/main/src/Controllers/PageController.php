<?php namespace EvolutionCMS\Main\Controllers;
use Seiger\sLang\Models\sLangContent;

class PageController extends BaseController
{
    public function render()
    {
        parent::render();
        $populars = sLangContent::langAndTvs(evo()->getLocae(),['image','tv_views'])->whereParent(2)->active()->addSelect('site_content.publishedon')->orderByDesc('tv_views')->limit(5)->get();
        $this->data['populars'] = $populars;
    }
}