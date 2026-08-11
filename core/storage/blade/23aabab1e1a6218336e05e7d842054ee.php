<?php global $richtexteditorIds, $richtexteditorOptions; ?>

<?php $__currentLoopData = sLang::langConfig(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php ($isDefaultLang = $lang == sLang::langDefault()); ?>
    <!-- General <?php echo e($lang); ?> -->
    <div class="tab-page" id="tabGeneral_<?php echo e($lang); ?>">
        <h2 class="tab"><?php echo app('translator')->get('global.settings_general'); ?> <span class="badge bg-seigerit"><?php echo e($lang); ?></span></h2>
        <script>tpSettings.addTabPage(document.getElementById("tabGeneral_<?php echo e($lang); ?>"));</script>
        <div class="row form-row">
            <div class="row-col col-lg-12 col-12">
                <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'pagetitle', 'content' => $content])); ?>
                <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                    <div class="row form-row">
                        <div class="col-auto col-title-11">
                            <label for="<?php echo e($lang); ?>_pagetitle" class="warning"><?php echo app('translator')->get('global.resource_title'); ?></label>
                            <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('global.resource_title_help'); ?>"></i>
                        </div>
                        <div class="col">
                            <?php if($lang == sLang::langDefault()): ?>
                                <input name="<?php echo e($lang); ?>_pagetitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_pagetitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" />
                            <?php else: ?>
                                <div class="input-group">
                                    <input name="<?php echo e($lang); ?>_pagetitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_pagetitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" style="width: calc(100% - 52px);" />
                                    <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="padding:0 5px;color:#0275d8;">
                                        <i class="fa fa-language" style="font-size:x-large;"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <script>document.getElementsByName("<?php echo e($lang); ?>_pagetitle")[0].focus();</script>
                        </div>
                    </div>
                <?php endif; ?>
                <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'longtitle', 'content' => $content])); ?>
                <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                    <div class="row form-row">
                        <div class="col-auto col-title-11">
                            <label for="<?php echo e($lang); ?>_longtitle" class="warning"><?php echo app('translator')->get('global.long_title'); ?></label>
                            <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('global.resource_long_title_help'); ?>"></i>
                        </div>
                        <div class="col">
                            <?php if($lang == sLang::langDefault()): ?>
                                <input name="<?php echo e($lang); ?>_longtitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_longtitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" />
                            <?php else: ?>
                                <div class="input-group">
                                    <input name="<?php echo e($lang); ?>_longtitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_longtitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" style="width: calc(100% - 52px);" />
                                    <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="padding:0 5px;color:#0275d8;">
                                        <i class="fa fa-language" style="font-size:x-large;"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'description', 'content' => $content])); ?>
                <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                    <div class="row form-row">
                        <div class="col-auto col-title-11">
                            <label for="<?php echo e($lang); ?>_description" class="warning"><?php echo app('translator')->get('global.resource_description'); ?></label>
                            <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('global.resource_description_help'); ?>"></i>
                        </div>
                        <div class="col">
                            <?php if($lang == sLang::langDefault()): ?>
                                <input name="<?php echo e($lang); ?>_description" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_description', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" />
                            <?php else: ?>
                                <div class="input-group">
                                    <input name="<?php echo e($lang); ?>_description" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_description', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" style="width: calc(100% - 52px);" />
                                    <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="padding:0 5px;color:#0275d8;">
                                        <i class="fa fa-language" style="font-size:x-large;"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($content['type'] == 'reference' || evo()->getManagerApi()->action == '72'): ?> 
                    <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'ta', 'content' => $content])); ?>
                    <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                        <div class="row form-row">
                            <div class="col-auto col-title-11">
                                <label for="<?php echo e($lang); ?>_content" class="warning"><?php echo app('translator')->get('global.weblink'); ?></label>
                                <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('global.resource_weblink_help'); ?>"></i>
                            </div>
                            <div class="col">
                                <i id="llock_<?php echo e($lang); ?>" class="<?php echo e($_style["icon_chain"]); ?>" onclick="enableLinkSelection(!allowLinkSelection);"></i>
                                <input name="<?php echo e($lang); ?>_content" id="<?php echo e($lang); ?>_content" type="text" maxlength="255" value="<?php echo e(($value = get_by_key($content, $lang.'_content', '', 'is_scalar')) !== '' ? entities(stripslashes($value), evo()->getConfig('modx_charset')) : 'http://'); ?>" class="form-control" onchange="documentDirty=true;" />
                                <input type="button" value="<?php echo app('translator')->get('global.insert'); ?>" onclick="BrowseFileServer('<?php echo e($lang); ?>_content')" />
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'introtext', 'content' => $content])); ?>
                <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                    <div class="row form-row">
                        <div class="col-auto col-title-11">
                            <label for="<?php echo e($lang); ?>_introtext" class="warning"><?php echo app('translator')->get('global.resource_summary'); ?></label>
                            <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('global.resource_summary_help'); ?>"></i>
                        </div>
                        <div class="col">
                            <?php if($lang == sLang::langDefault()): ?>
                                <textarea id="<?php echo e($lang); ?>_introtext" name="<?php echo e($lang); ?>_introtext" class="form-control" rows="3" cols="" onchange="documentDirty=true;"><?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_introtext', '', 'is_scalar')))); ?></textarea>
                            <?php else: ?>
                                <div class="input-group">
                                    <textarea id="<?php echo e($lang); ?>_introtext" name="<?php echo e($lang); ?>_introtext" class="form-control" rows="3" cols="" onchange="documentDirty=true;" style="width: calc(100% - 52px);"><?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_introtext', '', 'is_scalar')))); ?></textarea>
                                    <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="padding:0 5px;color:#0275d8;">
                                        <i class="fa fa-language" style="font-size:x-large;"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'menutitle', 'content' => $content])); ?>
                <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                    <div class="row form-row">
                        <div class="col-auto col-title-11">
                            <label for="<?php echo e($lang); ?>_menutitle" class="warning"><?php echo app('translator')->get('global.resource_opt_menu_title'); ?></label>
                            <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('global.resource_opt_menu_title_help'); ?>"></i>
                        </div>
                        <div class="col">
                            <?php if($lang == sLang::langDefault()): ?>
                                <input name="<?php echo e($lang); ?>_menutitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_menutitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" />
                            <?php else: ?>
                                <div class="input-group">
                                    <input name="<?php echo e($lang); ?>_menutitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_menutitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" style="width: calc(100% - 52px);" />
                                    <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="padding:0 5px;color:#0275d8;">
                                        <i class="fa fa-language" style="font-size:x-large;"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if($content['type'] == 'document' || evo()->getManagerApi()->action == '4'): ?>
            <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'content', 'content' => $content])); ?>
            <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                <table>
                    <tr>
                        <td colspan="2" class="col">
                            <hr> <!-- Content -->
                            <div class="clearfix">
                                <span id="<?php echo e($isDefaultLang ? 'content_header' : 'content_header_'.$lang); ?>"><?php echo app('translator')->get('global.resource_content'); ?></span>
                                <?php if($lang != sLang::langDefault()): ?>
                                    <label class="float-right">
                                        <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="height: 25px;padding:0 5px;color:#0275d8;">
                                            <i class="fa fa-language" style="font-size:x-large;"></i>
                                        </button>
                                    </label>
                                <?php endif; ?>
                                <?php if($isDefaultLang): ?>
                                    <label class="float-right"><?php echo app('translator')->get('global.which_editor_title'); ?>
                                        <select id="which_editor" class="form-control form-control-sm" size="1" name="which_editor" onchange="changeRTE();">
                                            <option value="none"><?php echo app('translator')->get('global.none'); ?></option>
                                            
                                            <?php ($evtOut = evo()->invokeEvent("OnRichTextEditorRegister")); ?>
                                            <?php if(is_array($evtOut)): ?>
                                                <?php for($i = 0; $i < count($evtOut); $i++): ?>
                                                    <?php ($editor = $evtOut[$i]); ?>
                                                    <option value="<?php echo e($editor); ?>"<?php echo (evo()->getConfig('which_editor') == $editor ? ' selected="selected"' : ''); ?>><?php echo e($editor); ?></option>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </select>
                                    </label>
                                <?php endif; ?>
                            </div>
                            <div id="<?php echo e($isDefaultLang ? 'content_body' : 'content_body_'.$lang); ?>">
                                <?php if((!empty($content['richtext']) || evo()->getManagerApi()->action == '4') && evo()->getConfig('use_editor') && evo()->getConfig('which_editor') !== 'none'): ?>
                                    <?php ($htmlContent = get_by_key($content, $lang.'_content', '', 'is_scalar')); ?>
                                    <div class="section-editor clearfix">
                                        <textarea id="<?php echo e($lang); ?>_content" name="<?php echo e($lang); ?>_content" onchange="documentDirty=true;"><?php echo evo()->getPhpCompat()->htmlspecialchars($htmlContent); ?></textarea>
                                    </div>
                                    
                                    <?php ($richtexteditorIds[evo()->getConfig('which_editor')][] = $lang.'_content'); ?>
                                    <?php ($richtexteditorOptions[evo()->getConfig('which_editor')][] = [$lang.'_content' => '']); ?>
                                <?php else: ?>
                                    <?php ($plainContent = get_by_key($content, $lang.'_content', '')); ?>
                                    <?php if($isDefaultLang): ?>
                                        <div>
                                            <textarea
                                                class="phptextarea"
                                                id="ta"
                                                name="ta"
                                                rows="20"
                                                wrap="soft"
                                                onchange="documentDirty=true;"
                                                data-slang-default-content="1"
                                                data-slang-codemirror-target="1"
                                                data-slang-editor-key="ta"
                                            ><?php echo evo()->getPhpCompat()->htmlspecialchars($plainContent); ?></textarea>
                                            <input
                                                type="hidden"
                                                id="<?php echo e($lang); ?>_content_proxy"
                                                name="<?php echo e($lang); ?>_content"
                                                value="<?php echo evo()->getPhpCompat()->htmlspecialchars($plainContent); ?>"
                                                data-slang-default-content-proxy="1"
                                            />
                                        </div>
                                    <?php else: ?>
                                        <div><textarea class="phptextarea" id="<?php echo e($lang); ?>_content" name="<?php echo e($lang); ?>_content" rows="20" wrap="soft" onchange="documentDirty=true;" data-slang-codemirror-target="1" data-slang-editor-key="<?php echo e($lang); ?>_content"><?php echo evo()->getPhpCompat()->htmlspecialchars($plainContent); ?></textarea></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr><td><hr></td></tr>
                </table>
            <?php endif; ?>
        <?php endif; ?>
        
        <?php if(!evo()->getConfig('check_sSeo', false)): ?>
            <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'seotitle', 'content' => $content])); ?>
            <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                <div class="row form-row">
                    <div class="row-col col-lg-12 col-12">
                        <div class="row form-row">
                            <div class="col-auto col-title-11">
                                <label for="<?php echo e($lang); ?>_seotitle" class="warning"><?php echo app('translator')->get('sLang::global.seotitle'); ?></label>
                                <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('sLang::global.seotitle_help'); ?>"></i>
                            </div>
                            <div class="col">
                                <?php if($lang == sLang::langDefault()): ?>
                                    <input name="<?php echo e($lang); ?>_seotitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_seotitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" />
                                <?php else: ?>
                                    <div class="input-group">
                                        <input name="<?php echo e($lang); ?>_seotitle" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_seotitle', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" style="width: calc(100% - 52px);" />
                                        <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="padding:0 5px;color:#0275d8;">
                                            <i class="fa fa-language" style="font-size:x-large;"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php ($evtField = evo()->invokeEvent('sLangDocFormFieldRender', ['lang' => $lang, 'name' => 'seodescription', 'content' => $content])); ?>
            <?php if(is_array($evtField)): ?><?php echo implode('', $evtField); ?><?php else: ?>
                <div class="row form-row">
                    <div class="row-col col-lg-12 col-12">
                        <div class="row form-row">
                            <div class="col-auto col-title-11">
                                <label for="<?php echo e($lang); ?>_seodescription" class="warning"><?php echo app('translator')->get('sLang::global.seodescription'); ?></label>
                                <i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo app('translator')->get('sLang::global.seodescription_help'); ?>"></i>
                            </div>
                            <div class="col">
                                <?php if($lang == sLang::langDefault()): ?>
                                    <input name="<?php echo e($lang); ?>_seodescription" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_seodescription', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" />
                                <?php else: ?>
                                    <div class="input-group">
                                        <input name="<?php echo e($lang); ?>_seodescription" type="text" maxlength="255" value="<?php echo e(evo()->getPhpCompat()->htmlspecialchars(stripslashes(get_by_key($content, $lang.'_seodescription', '', 'is_scalar')))); ?>" class="form-control" onchange="documentDirty=true;" spellcheck="true" style="width: calc(100% - 52px);" />
                                        <button data-lang="<?php echo e($lang); ?>" class="btn btn-light js_translate" type="button" title="<?php echo app('translator')->get('sLang::global.auto_translate'); ?> <?php echo e(strtoupper(sLang::langDefault())); ?> => <?php echo e(strtoupper($lang)); ?>" style="padding:0 5px;color:#0275d8;">
                                            <i class="fa fa-language" style="font-size:x-large;"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?><!-- end .sectionBody -->
        
        <?php if($group_tvs < 3 && isset($templateVariablesLng[$lang])): ?><?php echo $templateVariablesLng[$lang]; ?><div class="split my-3"></div><?php endif; ?>
        
        <?php ($seoFields = evo()->invokeEvent('OnRenderSeoFields', ['type' => 'document', 'lang' => $lang, 'id' => ($content['id'] ?? 0)])); ?>
        <?php if(is_array($seoFields)): ?><?php echo implode('', $seoFields); ?><div class="split my-3"></div><?php endif; ?>
    </div>
    <!-- end #tabGeneral -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/core/vendor/seiger/slang/views/resourceGeneralTab.blade.php ENDPATH**/ ?>