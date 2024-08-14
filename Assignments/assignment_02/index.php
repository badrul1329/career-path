<?php
declare(strict_types=1);

include "./financeManager.php";

class CLIApp{
    private FinanceManager $finance_manager;
    public function __construct(){
        $this->finance_manager = new FinanceManager();
    }
    public function show_options(string $label = '',$options){
        echo "\n{$label}:\n";
        echo "=================\n";
        foreach($options as $option){
            echo $option->value .". ".ucwords(str_replace('_',' ',$option->name))."\n";
        }
        echo "\n";
    }
    public function run(){
        $choice = 0;
        do{
            $this->show_options("Options",Options::cases());
            $choice = intval(readline("Please choose an option: "));
            switch ($choice){
                case Options::Add_categories->value :
                    $name = strtolower(readline("Category Name: "));
                    $this->show_options("Categories",Types::cases());
                    $type = intval(readline("Please choose a type: "));
                    $this->finance_manager->addCategories($name,$type);
                    break;
                case Options::View_categories->value :
                    $this->finance_manager->categories();
                    break;
                case Options::Add_income->value :
                case Options::Add_expense->value :
                    $amount = floatval(readline("Amount: "));
                    $category = strtolower(readline("Category Name: "));
                    $this->finance_manager->addTransaction($amount,$category);
                    break;
                case Options::View_incomes->value :
                    $this->finance_manager->viewTransaction(Types::INCOME->value);
                    break;
                case Options::View_expenses->value :
                    $this->finance_manager->viewTransaction(Types::EXPENSE->value);
                    break;
                case Options::View_savings->value :
                    $this->finance_manager->total();
                    break;
                default:
                    break;
            }
        }while($choice);

    }
}
$app = new CLIApp;
$app->run();