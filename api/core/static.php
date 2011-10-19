<?php

/**
 * Description of static
 *
 * @author michaelmeyers
 */
class wow_php_static 
{
    
    // Regions 
    static $REGION_US = "us.battle.net";
    static $REGION_EU = "eu.battle.net";
    static $REGION_KR = "kr.battle.net";
    static $REGION_TW = "tw.battle.net";
    static $REGION_CN = "battlenet.com.cn";
    
    // Supported Locale
    static $SUPPORTED_LOCALE_US = array("en_US","es_MX");
    static $SUPPORTED_LOCALE_EU = array("en_GB","es_ES","fr_FR","ru_RU","de_DE");
    static $SUPPORTED_LOCALE_KR = array("ko_KR");
    static $SUPPORTED_LOCALE_TW = array("zh_TW");
    static $SUPPORTED_LOCALE_CN = array("zh_CN");
    
    //Error Reasons
    static $ERROR_INVALID_APP		= "Invalid Application";
    static $ERROR_INVALID_PERMISSIONS	= "Invalid application permissions.";
    static $ERROR_ACCESS_DENIED		= "Access denied, please contact api-support@blizzard.com";
    static $ERROR_404			= "When in doubt, blow it up. (page not found)";
    static $ERROR_THROTTLED		= "If at first you don't succeed, blow it up again. (too many requests)";
    static $ERROR_SERVER_FAIL		= "Have you not been through enough? Will you continue to fight what you cannot defeat? (something unexpected happened)";
    static $ERROR_BAD_AUTH		= "Invalid authentication header.";
    static $ERROR_BAD_SIG		= "Invalid application signature.";
    
    //URL
    static $URL_BASE	    = "/api/wow/";
    
    static $URL_THUMB_US    = "/static-render/us/";
    static $URL_THUMB_EU    = "/static-render/eu/";
    static $URL_THUMB_KR    = "/static-render/kr/";
    static $URL_THUMB_TW    = "/static-render/tw/";
    static $URL_THUMB_CN    = "/static-render/cn/";
    
    static $URL_ICON_BASE   = "/wow/icons/";
    static $URL_ICON_US	    = "us.media.blizzard.com";
    static $URL_ICON_EU	    = "eu.media.blizzard.com";
    static $URL_ICON_KR	    = "kr.media.blizzard.com";
    static $URL_ICON_TW	    = "tw.media.blizzard.com";
    static $URL_ICON_CN	    = "tw.media.blizzard.com"; //China icon locations unknown
    
    //Icons
    static $ICON_SMALL	    = "18";
    static $ICON_MEDIUM	    = "36";
    static $ICON_LARGE	    = "56";
    
    //Wow PHP API Values
    static $INTERNAL_LIBRARY_NAME	= "wow-php-api";
    static $INTERNAL_LIBRARY_VERSION	= 0.1;
}