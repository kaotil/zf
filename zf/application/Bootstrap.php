<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initLang()
    {
        // 言語ファイルのロード
        $translator = new Zend_Translate(
            'array',
            realpath(APPLICATION_PATH . '/../library/lang/Zend_Validate.php'),
            'ja',
            array('scan' => Zend_Translate::LOCALE_FILENAME)
        );
        // デフォルトのトランスレータを設定
        Zend_Validate_Abstract::setDefaultTranslator($translator);

        // 全角の文字数チェック用
        iconv_set_encoding('internal_encoding', 'utf-8');
    }
}

