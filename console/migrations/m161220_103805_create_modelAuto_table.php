<?php

use yii\db\Migration;

/**
 * Handles the creation of table `modelauto`.
 * Has foreign keys to the tables:
 *
 * - `type`
 * - `brand`
 */
class m161220_103805_create_modelAuto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('modelauto', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'image' => $this->string(),
            'type_id' => $this->integer(),
            'description' => $this->text(),
            'brand_id' => $this->integer(),
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            'idx-modelauto-type_id',
            'modelauto',
            'type_id'
        );

        // add foreign key for table `type`
        $this->addForeignKey(
            'fk-modelauto-type_id',
            'modelauto',
            'type_id',
            'type',
            'id',
            'CASCADE'
        );

        // creates index for column `brand_id`
        $this->createIndex(
            'idx-modelauto-brand_id',
            'modelauto',
            'brand_id'
        );

        // add foreign key for table `brand`
        $this->addForeignKey(
            'fk-modelauto-brand_id',
            'modelauto',
            'brand_id',
            'brand',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `type`
        $this->dropForeignKey(
            'fk-modelauto-type_id',
            'modelauto'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            'idx-modelauto-type_id',
            'modelauto'
        );

        // drops foreign key for table `brand`
        $this->dropForeignKey(
            'fk-modelauto-brand_id',
            'modelauto'
        );

        // drops index for column `brand_id`
        $this->dropIndex(
            'idx-modelauto-brand_id',
            'modelauto'
        );

        $this->dropTable('modelauto');
    }
}
