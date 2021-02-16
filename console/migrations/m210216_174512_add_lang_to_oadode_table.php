<?php

use yii\db\Migration;

/**
 * Class m210216_174512_add_lang_to_oadode_table
 */
class m210216_174512_add_lang_to_oadode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('oadode', 'lang', $this->integer()->after('business_title'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_174512_add_lang_to_oadode_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_174512_add_lang_to_oadode_table cannot be reverted.\n";

        return false;
    }
    */
}
