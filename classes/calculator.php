<?php

require_once "stack.php";


/**
 *  Basic calculator class with two main functions.
 *
 * It uses Stack class for manipulating with arrays. Also we can use Trees instead of Stack
 *
 * @author Hrayr Shahbazyan
 */
class Calculator
{

    protected $SUB = array('/', '*');  // Division and Multiplication operators
    protected $ADD = array('+', '-'); // Addition and Subtraction operators

    //@todo we can define other operators here

    /**
     * Convert Infix to Postfix
     *
     *
     * @param String $infix A standard notation equation
     * @return Array RPN Stack
     */
    public function infixToPostfix($infix)
    {

        $postfix = array();
        $stack = new Stack();

        $infix = preg_replace("/\s/", "", $infix); // remove whitespaces

        // postfix array index
        $postfixIndex = 0;

        $lastChar = '';

        for ($i = 0; $i < strlen($infix); $i++) {

            $chr = substr($infix, $i, 1); // pull out 1 character from the string

            if (preg_match('/[0-9.]/i', $chr)) {  // if digit
                if ((!preg_match('/[0-9.]/i', $lastChar) && ($lastChar != "")) && (@$postfix[$postfixIndex] != "-"))
                    $postfixIndex++;
                $postfix[$postfixIndex] .= $chr;
            } elseif (in_array($chr, $this->SUB)) {  // If operator '*' or '/'
                while (in_array($stack->peek(), $this->SUB))
                    $postfix[++$postfixIndex] = $stack->pop();
                $stack->push($chr);
                $postfixIndex++;
            } elseif (in_array($chr, $this->ADD)) {   // if a '+' or '-'

                while (in_array($stack->peek(), array_merge($this->SUB, $this->ADD)))
                    $postfix[++$postfixIndex] = $stack->pop();
                $stack->push($chr);
                $postfixIndex++;
            }

            //@todo if we will have other operators we have to check them here into elseif case
            $lastChar = $chr;
        }

        // if there is anything on the stack after we are done...add it to the back of the RPN array
        while (($tmp = $stack->pop()) !== false)
            $postfix[++$postfixIndex] = $tmp;

        // re-index the array at 0
        $postfix = array_values($postfix);

        return $postfix;
    }

    /**
     * Solve Postfix (Reverse Polish Notation)
     *
     * Solve well formatted RPN array and return float result
     *
     * @throws Exception
     * @param Array $postfixArray RPN formatted array
     * @return Float result
     */
    public function solvePostfix($postfixArray)
    {

        $temp = array();
        $index = 0;

        for ($i = 0; $i < count($postfixArray); $i++) {

            // If number add it into the temp
            if (!in_array($postfixArray[$i], array_merge($this->SUB, $this->ADD))) {
                $temp[$index++] = $postfixArray[$i];
            } // If operator perform it to last two numbers
            else {
                switch ($postfixArray[$i]) {
                    case '+':
                        $temp[$index - 2] = $temp[$index - 2] + $temp[$index - 1];
                        break;
                    case '-':
                        $temp[$index - 2] = $temp[$index - 2] - $temp[$index - 1];
                        break;
                    case '*':
                        $temp[$index - 2] = $temp[$index - 2] * $temp[$index - 1];
                        break;
                    case '/':
                        if ($temp[$index - 1] == 0) {
                            //  throw new Exception("Division by 0");
                            return "Division by 0";
                        }
                        $temp[$index - 2] = $temp[$index - 2] / $temp[$index - 1];
                        break;

                    //@todo if we will have other operators we have to add new "case"s
                }

                $index = $index - 1;
            }
        }

        return $temp[$index - 1];

    }

    /**
     * Solve Infix
     *
     * http://en.wikipedia.org/wiki/Infix_notation
     *
     * @param String $infix Standard Equation to solve
     * @return Solved equation
     */
    function solveInfix($infix)
    {

        //@todo check if infix is a 'valid' expression and remove all unexpected characters

        return $this->solvePostfix($this->infixToPostfix($infix));

    }


    function checkInfix()
    {

        // @todo check if infix expression is valid
    }
}
