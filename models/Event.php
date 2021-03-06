<?php
/**
 * User: aslukili
 * Date: 6/10/2022
 * Time: 9:15 AM
 */

namespace app\models;


use app\core\db\DbModel;

/**
 * Class Event
 *
 * @author  Abdeslam Loukili <abdeslam.edu@gmail.com>
 * @package app\models
 */
class Event extends DbModel
{
    public int $id = 0;
    public string $title = '';
    public string $sub_title = '';
    public string $description = '';
    public string $responsible = '';
    public string $seats = '';
    public string $country = '';
    public string $starting_date = '';
    public string $ending_date = '';
    public string $image = '';

    public static function tableName(): string
    {
        return 'events';
    }

    public function attributes(): array
    {
        return ['title', 'sub_title', 'description', 'responsible', 'seats', 'country', 'starting_date', 'ending_date', 'image'];
    }


    public function rules()
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'sub_title' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'starting_date' => [self::RULE_REQUIRED],
            'ending_date' => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        return parent::save();
    }

    public function findOne(int $id)
    {
        return parent::findOne($id);
    }


    public function getAll()
    {
        return parent::getAll();
    }

    public function delete(int $id)
    {
        $tableName = $this->tableName();
        $statement = self::prepare("SET FOREIGN_KEY_CHECKS=0; DELETE FROM $tableName WHERE id = $id; SET FOREIGN_KEY_CHECKS=1;");
        $statement->execute();
        return true;
    }

    public function update(int $id)
    {
        return parent::update($id);
    }

}