<?php
class Plugin_current_path extends Plugin
{
    public function index()
    {
    	// return Path::tidy(Config::getSiteRoot() . URL::getCurrent());
    	return Path::tidy(URL::getCurrent());
    }
}