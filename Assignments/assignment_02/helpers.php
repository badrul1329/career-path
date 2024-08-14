<?php
enum Types: int
{
    case INCOME = 0;
    case EXPENSE = 1;
}
enum Options: int
{
    case Add_categories = 1;
    case View_categories = 2;
    case Add_income = 3;
    case Add_expense = 4;
    case View_incomes = 5;
    case View_expenses = 6;
    case View_savings = 7;
    case Exit = 0;
}
