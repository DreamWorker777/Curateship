<?php $layout_template = (isset($settings_data['blog_template']) && !empty($settings_data['blog_template'])) ? "templates.home.{$settings_data['blog_template']}" : 'templates.home.default'; ?>
@extends($layout_template)