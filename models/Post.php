<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $ID
 * @property string $title
 * @property string $abstract
 * @property string $body
 * @property string $date
 * @property string $author
 * @property string $categories
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'abstract', 'body', 'author', 'categories'], 'required'],
            [['abstract', 'body'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['author', 'categories'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'title' => 'Titolo',
            'abstract' => 'Testo Breve',
            'body' => 'Testo del Post',
            'date' => 'Data',
            'author' => 'Autore',
            'categories' => 'Categoria',
        ];
    }

    /**
     * @inheritdoc
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
