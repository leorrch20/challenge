<?php

use yii\db\Migration;

/**
 * Class m210216_174617_add_oadode_id_for_relation_oadode_to_description_of_goods_table
 */
class m210216_174617_add_oadode_id_for_relation_oadode_to_description_of_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('description_of_goods', 'oadode_id', $this->integer()->after('user_id'));

        // add foreign key for table `oadode`
        $this->addForeignKey(
            'fk-description_of_goods-oadode_id',
            'description_of_goods',
            'oadode_id',
            'oadode',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_174617_add_oadode_id_for_relation_oadode_to_description_of_goods_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_174617_add_oadode_id_for_relation_oadode_to_description_of_goods_table cannot be reverted.\n";

        return false;
    }
    */
}
