<?php namespace EvolutionCMS\Main\Controllers;

use EvolutionCMS\Models\SiteTmplvarContentvalue;
use Seiger\sLang\Models\sLangContent;

class BlogController extends BaseController
{
    public function render()
    {
        parent::render();

        $articles = sLangContent::langAndTvs(evo()->getLocae(),['image'])->whereParent(2)->active()->addSelect('site_content.publishedon')->orderByDesc('publishedon')->cursorPaginate(3);
        $this->data['test'] = 'test';
        $this->data['articles'] = $articles;

        $this->data['previousPageUrl'] = $articles->previousPageUrl() ?? null;
        $this->data['nextPageUrl'] = $articles->nextPageUrl() ?? null;
        $populars = sLangContent::langAndTvs(evo()->getLocae(),['image','tv_views'])->whereParent(2)->active()->addSelect('site_content.publishedon')->orderByDesc('tv_views')->limit(5)->get();
        $this->data['populars'] = $populars;
        
    }

    public function noCacheRender()
    {
        if (!isset($_SESSION['views']) || !is_array($_SESSION['views'])) {
            $_SESSION['views'] = [];
        }

        $documentId = evo()->documentIdentifier;

        if (isset($_SESSION['views'][$documentId])) {
            return;
        }

        $tv = SiteTmplvarContentvalue::where('tmplvarid', 5)->where('contentid', $documentId)->first();
        if ($tv) {
            $views = (int)$tv->value;
        } else {
            $tv = new SiteTmplvarContentvalue();
            $views = 0;
        }
        $tv->value = $views + 1;
        $tv->tmplvarid = 5;
        $tv->contentid = $documentId;
        $tv->save();

        $_SESSION['views'][$documentId] = true;
    }
}