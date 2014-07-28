<?php

namespace Oro\ORM\Query\AST\Platform\Functions\Mysql;

use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\SqlWalker;
use Oro\ORM\Query\AST\Functions\DateTime\ConvertTz as BaseFunction;
use Oro\ORM\Query\AST\Platform\Functions\PlatformFunctionNode;

class ConvertTz extends PlatformFunctionNode
{
    /**
     * @param SqlWalker $sqlWalker
     *
     * @return string
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        /** @var Node $value */
        $value = $this->parameters[BaseFunction::VALUE_KEY];
        /** @var Node $fromTz */
        $fromTz = $this->parameters[BaseFunction::FROM_TZ_KEY];
        /** @var Node $toTz */
        $toTz = $this->parameters[BaseFunction::TO_TZ_KEY];

        return 'CONVERT_TZ('
            . $value->dispatch($sqlWalker)
            . ', '
            . $fromTz->dispatch($sqlWalker)
            . ', '
            . $toTz->dispatch($sqlWalker)
        . ')';
    }
}
