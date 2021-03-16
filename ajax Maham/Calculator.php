<?php
class Calculator
{
    private $_iLeftOpr, $_iRightOpr, $_sSummary, $_mResult;

    public function __construct($sOperation, $iLeftOpr, $iRightOpr)
    {
        $this->_iLeftOpr = (int) $iLeftOpr;
        $this->_iRightOpr = (int) $iRightOpr;

        $this->exec($sOperation);
    }

    
    public function xmlOutput()
    {
        header('Content-Type:text/xml'); 

        
        return
            '<output>
                <result>' . $this->_mResult . '</result>
                <summary>' . htmlspecialchars($this->_sSummary) . '</summary>
            </output>';
    }

    public function result()
    {
        return $this->_mResult;
    }

    public function summary()
    {
        return $this->_sSummary;
    }

    protected function exec($sOperation)
    {
        switch ($sOperation)
        {
            case 'add':
                $this->_mResult = ($this->_iLeftOpr+$this->_iRightOpr);
                $this->_sSummary = $this->_iLeftOpr . ' + ' . $this->_iRightOpr . ' = ' . $this->_mResult;
            break;

            case 'subtract':
                $this->_mResult = ($this->_iLeftOpr-$this->_iRightOpr);
                $this->_sSummary = $this->_iLeftOpr . ' - ' . $this->_iRightOpr . ' = ' . $this->_mResult;
            break;

            case 'multiply':
                $this->_mResult = ($this->_iLeftOpr*$this->_iRightOpr);
                $this->_sSummary = $this->_iLeftOpr . ' * ' . $this->_iRightOpr . ' = ' . $this->_mResult;
            break;

            case 'divide':
                $this->_mResult = ($this->_iLeftOpr/$this->_iRightOpr);
                $this->_sSummary = $this->_iLeftOpr . ' / ' . $this->_iRightOpr . ' = ' . $this->_mResult;
            break;

           
            default:
                throw new InvalidArgumentException(sprintf('"%s" is an invalid operation.', str_replace('_', '', $sOperation)));
        }
    }

}