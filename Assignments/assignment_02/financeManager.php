<?php
include "./FileManager.php";
include "./helpers.php";
class FinanceManager{
    private $manager,$data;
    public function __construct(){
        $this->manager = new FileManager('data.txt');
        $this->data = $this->manager->getData();
    }

// Add category
    public function addCategories(string $name,int $type){
        $result = $this->check_category_exists($name);
        if($result){
            echo "\nCategory Exists\n";
            return false;
        }
        array_push($this->data['categories'],[$name,$type]);
        $this->manager->save($this->data);
        echo "\nCategory added successfully\n";
    }

// View categories
    public function categories(){
        $categories = $this->data['categories'];
        echo "\n";
        foreach($categories as $category){
            echo "Name: ".ucwords($category[0])." Type: ".ucfirst(Types::from($category[1])->name)."\n";
        }
    }

    public function check_category_exists($categoryName){
        $category = array_filter($this->data['categories'],function($category) use ($categoryName) {
            return ($category[0]==$categoryName);
        });
        return count($category);
    }

// Add income/expense
    public function addTransaction(float $amount=0.0,string $category){
        $result = $this->check_category_exists($category);
        if(!$result){
            echo "\nCategory Not Exists\n";
            return false;
        }
        array_push($this->data['transactions'],[$category,$amount]);
        $this->manager->save($this->data);
        echo "\nCategory added successfully\n";
    }

// View incomes/expenses
    public function viewTransaction($type){
        $categories = array();
        foreach($this->data['categories'] as $category){
            if($category[1]==$type) array_push($categories,$category[0]);
        };
        $transactions = array_filter($this->data['transactions'],function($transaction) use ($categories) {
            return in_array($transaction[0],$categories);
        });
        foreach($transactions as $transaction){
            echo ucwords($transaction[0])." : ".$transaction[1]."\n";
        }
    }

// Total savings
    public function total(){
        $category_income =[];
        $categories = $this->data['categories'];
        foreach($categories as $category){
            if($category[1] == Types::INCOME->value){
                array_push($category_income,$category[0]);
            }
        };
        $transactions = $this->data['transactions'];
        $total_income = 0;
        $total_expense = 0;
        foreach($transactions as $transaction){
            if(in_array($transaction[0],$category_income)){
                $total_income += $transaction[1];
            }else{
                $total_expense += $transaction[1];
            }
        }
        echo "Total Income: {$total_income}\nTotal Expense: {$total_expense}\n";
        $saving = $total_income - $total_expense;
        echo "Savings: ".abs($saving);
        echo ((!$saving)? "\n( In Loss)":'')."\n";
    }

    public function __destruct(){
        echo "\nThank you\n";
    }
}