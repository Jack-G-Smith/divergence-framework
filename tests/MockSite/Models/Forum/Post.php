<?php
/**
 * This file is part of the Divergence package.
 *
 * (c) Henry Paradiz <henry.paradiz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divergence\Tests\MockSite\Models\Forum;

use Divergence\Models\Relations;
use Divergence\Models\Versioning;

use Divergence\Tests\MockSite\Mock\Data;

class Post extends \Divergence\Models\Model
{
    use Versioning;
    use Relations;

    // support subclassing
    public static $rootClass = __CLASS__;
    public static $defaultClass = __CLASS__;
    public static $subClasses = [__CLASS__];


    // ActiveRecord configuration
    public static $tableName = 'forum_posts';
    public static $singularNoun = 'post';
    public static $pluralNoun = 'posts';

    // versioning
    public static $historyTable = 'forum_posts_history';
    public static $createRevisionOnDestroy = true;
    public static $createRevisionOnSave = true;

    public static $fields = [
        'Content' => [
            'type' => 'clob',
            'required' => true,
            'notnull' => true,
        ],
        'ThreadID' => [
            'type' => 'integer',
            'required' => true,
            'notnull' => true,
        ],
    ];

    public static $indexes = [
        'ThreadID' => [
            'fields' => [
                'ThreadID',
            ],
            'unique' => false,
        ],
    ];

    public static $relationships = [
        /*
         *  The first one is testing the minimal configuration of a one-to-one relationship
         *  The key in this case "Thread" is used to look for $Key.'ID' in this case "ThreadID" as the local
         *  The foreign is assumed to have it's own PK as ID
         */

        'Thread' => [
            'class' => Thread::class,
        ],
        'ThreadExplicit' => [
            'type' => 'one-one',
            'class' => Thread::class,
            'local' => 'ThreadID',
            'foreign' => 'ID',
        ],
    ];
}
