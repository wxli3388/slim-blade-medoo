<?php
namespace App\Myclass;

use Src\DB\DB;

class Myclass
{
    private $db;
    public function __construct() {
        $this->db = Db::getInstance('pgsql');
    }

    /**
     * SELECT title, author FROM stockWeb_stock_articles WHERE sid>10
     * return fetch data
     */
    public function selectDB(){
        $datas = $this->db->select('stockWeb_stock_articles',[
            'title',
            'author'
        ],[
            'sid[>]' => 10,
        ]);
        return $datas;
    }

    /**
     * INSERT INTO stockWeb_stock_articles (title, author, article_url, notification, publish_date) 
     * VALUES ('this is test title', 'admin', '127.0.0.1', 'Y', date('Y-m-d H:i:s'))
     * 
     * return last insert id
     */
    public function insertDB(){
        try{
            $this->db->insert('stockWeb_stock_articles',[
                'title' => 'this is test title',
                'author' => 'admin',
                'article_url' => '127.0.0.1',
                'notification' => 'Y',
                'publish_date' => date('Y-m-d H:i:s')
            ]);
            if($this->db->error()[2]!==NULL)
                throw new \Exception($this->db->error()[2]);            
        } catch (\Exception $e){
            return $e->getMessage();
        }
        return $this->db->id();
        
    }

    /**
     * UPDATE stockWeb_stock_articles SET 'notification' = 'N' WHERE sid = '15316'
     * return affected row count
     */
    public function updateDB(){
        $datas = $this->db->update('stockWeb_stock_articles',[
            'notification' => 'N',
        ],[
            'sid' => '15316'
        ]);
        return $datas->rowCount();
    }

    public function deleteDB(){
        $datas = $this->db->delete('stockWeb_stock_articles',[
            'AND' => [
                'sid[>=]' => '15316'
            ]
        ]);
        return $datas->rowCount();
    }
}