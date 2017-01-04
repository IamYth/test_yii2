<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bid`.
 * Has foreign keys to the tables:
 *
 * - `brand`
 * - `modelauto`
 */
class m161220_104135_create_bid_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bid', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'number' => $this->integer(),
            'brand_id' => $this->integer(),
            'modelauto_id' => $this->integer(),
        ]);

        // creates index for column `brand_id`
        $this->createIndex(
            'idx-bid-brand_id',
            'bid',
            'brand_id'
        );

        // add foreign key for table `brand`
        $this->addForeignKey(
            'fk-bid-brand_id',
            'bid',
            'brand_id',
            'brand',
            'id',
            'CASCADE'
        );

        // creates index for column `modelauto_id`
        $this->createIndex(
            'idx-bid-modelauto_id',
            'bid',
            'modelauto_id'
        );

        // add foreign key for table `modelauto`
        $this->addForeignKey(
            'fk-bid-modelauto_id',
            'bid',
            'modelauto_id',
            'modelauto',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `brand`
        $this->dropForeignKey(
            'fk-bid-brand_id',
            'bid'
        );

        // drops index for column `brand_id`
        $this->dropIndex(
            'idx-bid-brand_id',
            'bid'
        );

        // drops foreign key for table `modelauto`
        $this->dropForeignKey(
            'fk-bid-modelauto_id',
            'bid'
        );

        // drops index for column `modelauto_id`
        $this->dropIndex(
            'idx-bid-modelauto_id',
            'bid'
        );

        $this->dropTable('bid');
    }
}
