<?php
namespace Hentailobby\Classes;

class Filter {
	public static function sanitizeString($args)
	{
		return filter_var($args, FILTER_SANITIZE_STRING);
	}
	public static function sanitizeInt($args)
	{
		return filter_var($args, FILTER_SANITIZE_NUMBER_INT);
	}
	public static function sanitizeUrl($args)
	{
		return filter_var($args, FILTER_SANITIZE_URL);
	}
	public static function sanitizeEmail($args)
	{
		return filter_var($args, FILTER_SANITIZE_EMAIL);
	}
	public static function sanitizeHTML($args)
	{
		return filter_var($args, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}
}