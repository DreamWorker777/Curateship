<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use \DB;
use Modules\Admin\Entities\Settings;

class SettingsSeeder extends Seeder
{
    private $table = 'settings';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $dateNow = now();

        $records = [
            [
                'key'           => 'logo_title',
                'value'         => 'SaigonFinest'
            ],
            [
                'key'           => 'logo_svg',
                'value'         => '<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000pt" height="25.000000pt" viewBox="0 0 200.000000 200.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,200.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="no"><path d="M855 1989 c-234 -33 -481 -175 -630 -362 -457 -571 -175 -1417 532 -1598 42 -10 88 -19 103 -19 l27 0 12 118 c21 200 17 188 76 228 80 52 126 120 146 213 8 40 7 62 -6 113 -9 34 -20 67 -24 71 -5 5 -10 -25 -13 -67 -9 -131 -78 -235 -194 -292 -54 -27 -68 -29 -169 -29 -98 0 -116 3 -167 27 -76 35 -130 79 -158 130 -22 40 -23 41 -4 55 24 18 115 65 118 61 90 -149 183 -183 315 -117 99 49 128 126 78 200 -38 56 -81 79 -222 118 -62 16 -132 68 -162 118 -21 36 -27 63 -31 122 -4 68 -1 84 22 134 37 76 101 132 184 157 52 16 92 20 216 20 l152 0 12 116 c27 256 60 333 181 426 l35 26 -41 11 c-106 29 -269 37 -388 20z"/><path d="M1410 1819 c-50 -15 -85 -44 -105 -86 -15 -32 -24 -85 -49 -305 l-4 -38 124 0 124 0 0 -75 0 -75 -135 0 c-74 0 -135 -2 -135 -5 0 -4 -83 -718 -132 -1128 -6 -53 -9 -99 -6 -102 8 -8 160 23 234 49 269 91 503 315 604 579 52 132 63 199 64 357 1 221 -45 381 -161 559 -60 93 -198 236 -247 256 -45 19 -135 26 -176 14z"/><path d="M695 1226 c-42 -18 -68 -61 -69 -113 -2 -75 72 -132 244 -188 47 -15 91 -32 98 -38 7 -5 14 -8 16 -6 2 2 11 67 20 144 9 77 19 157 22 178 l6 37 -154 0 c-104 -1 -163 -5 -183 -14z"/></g></svg>'
            ],
            [
                'key'           => 'page_title',
                'value'         => 'SaigonFinest'
            ],
            [
                'key'           => 'meta_title',
                'value'         => 'SaigonFinest'
            ],
            [
                'key'           => 'favicon',
                'value'         => 'assets/img/favicon.svg'
            ],
            [
                'key'           => 'post_page_title',
                'value'         => '[posttitle] | [sitetitle]'
            ],
            [
                'key'           => 'post_meta_title',
                'value'         => '[posttitle] | [sitetitle]'
            ],
            [
                'key'           => 'tag_page_title',
                'value'         => '[tagtitle] | [sitetitle]'
            ],
            [
                'key'           => 'tag_meta_title',
                'value'         => '[tagtitle] | [sitetitle]'
            ],
            [
                'key'           => 'profile_page_title',
                'value'         => '[username] | [sitetitle]'
            ],
            [
                'key'           => 'profile_meta_title',
                'value'         => '[username] | [sitetitle]'
            ],
            [
                'key'           => 'font_primary',
                'value'         => 'Roboto Slab'
            ],
            [
                'key'           => 'font_secondary',
                'value'         => 'Inter'
            ],
            [
                'key'           => 'font_logo',
                'value'         => 'Libre Caslon Display'
            ],
            [
                'key'           => 'tracker_script',
                'value'         => ''
            ],
            [
                'key'           => 'reg_en_fullname',
                'value'         => 'on'
            ],
            [
                'key'           => 'reg_en_verify_email',
                'value'         => 'on'
            ],
            [
                'key'           => 'notify_from_email',
                'value'         => ''
            ],
            [
                'key'           => 'template_email_confirm',
                'value'         => '<p>Please click the button below to verify your email address.</p><p><a href="{{URL}}">Verify Email Address</a></p><p>If you did not create an account, no further action is required.</p>'
            ],
            [
                'key'           => 'template_forgot_password',
                'value'         => '<p>You are receiving this email because we received a password reset request for your account.</p><p><a href="{{URL}}">Reset Password</a></p><p>This password reset link will expire in 1 hour.</p><p>If you did not request a password rest, no further action is required.</p>'
            ],
            [
                'key'           => 'app_template',
                'value'         => 'default'
            ],
            [
                'key'           => 'blog_template',
                'value'         => 'default'
            ],
            [
                'key'           => 'post_template',
                'value'         => 'default'
            ],
            [
                'key'           => 'page_template',
                'value'         => 'default'
            ],
            [
                'key'           => 'profile_template',
                'value'         => 'default'
            ],
            [
                'key'           => 'tag_template',
                'value'         => 'default'
            ],
        ];

		foreach ($records as $record) {
            $record['created_at'] = $dateNow;
            $record['updated_at'] = $dateNow;

            $update = ['key' => $record['key']];
            Settings::updateOrCreate($update, $record);
        }
    }
}
