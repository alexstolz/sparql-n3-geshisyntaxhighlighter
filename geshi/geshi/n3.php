<?php
/*************************************************************************************
 * sparql.php
 * -------
 * Author: Alex Stolz (alex.stolz@ebusiness-unibw.org), Christian Fürber (christian@fuerber.com)
 * Copyright: (c) 2012 E-Business and Web Science Research Group (http://www.unibw.de/ebusiness/)
 * Date Started: 2012/02/02
 * Release Version: 1.1.1
 *
 * SPARQL language file for GeSHi.
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$REGEXP_ENDDELIMITER = "(<SEMI>|[\],}\.])";
$REGEXP_VAR = "\?\w+";
$REGEXP_URIREF = "&lt;[^\s]*&gt;";
$REGEXP_CURIE = "\w*:[\w\-]+";
$REGEXP_SET = "\(.*\)";
$REGEXP_LITERAL = "((&quot;){1,3}(?:(?!&quot;).)*(&quot;){1,3}|\s+[0-9]+(\.[0-9]+)?|\w+(:\w+)?\(.*\))(\^\^($REGEXP_URIREF|$REGEXP_CURIE)|\@[\w\-]+)?";
$REGEXP_SUBJECT = "$REGEXP_VAR\s+|$REGEXP_CURIE\s+|$REGEXP_URIREF\s+";
$REGEXP_PREDICATE = "$REGEXP_VAR\s*|$REGEXP_CURIE\s*|$REGEXP_URIREF\s*|a\s*";
$REGEXP_OBJECT = "[\[]|($REGEXP_VAR|$REGEXP_CURIE|$REGEXP_URIREF|$REGEXP_LITERAL|$REGEXP_SET)\s*$REGEXP_ENDDELIMITER";

$language_data = array (
    'LANG_NAME' => 'N3_SPARQL',
    'COMMENT_SINGLE' => array(1 =>'# ', 2 => '##'),
    'COMMENT_MULTI' => array('/*' => '*/'),
    'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
    'QUOTEMARKS' => array(),//"'", '"', '`'),
    'ESCAPE_CHAR' => '\\',
    'KEYWORDS' => array(
        1 => array(
        '@prefix',
        'ADD','ALL','AS','ASC','ASK','BASE','BIND','BINDINGS','CLEAR','CONSTRUCT','COPY','COUNT','CREATE',
        'DATA','DEFAULT','DELETE','DESC','DESCRIBE','DISTINCT','DROP',
        'EXISTS','FILTER','FROM','GRAPH','GROUP BY','HAVING','IF','IN','INSERT','INTO','LIMIT','LOAD',
        'MINUS','MODIFY','MOVE','NAMED','NOT EXISTS','NOT IN','OFFSET','OPTIONAL','ORDER BY',
        'PREFIX','REDUCED','REPLACE','SELECT','SERVICE','SILENT','TO','UNION','USING','WHERE','WITH'
        ),
        2 => array(
        'abs','AVG','BNODE','bound','ceil','COALESCE','CONCAT','CONTAINS','datatype','day','ENCODE_FOR_URI',
        'floor','GROUP_CONCAT','hours','IRI','isBlank','isIRI','isLiteral','isNumeric','isURI','lang','langMatches',
        'LCASE','MAX','MD5','MIN','minutes','month','now','rand','regex','round','sameTerm','SAMPLE','seconds','SEPARATOR','SHA1',
        'SHA224','SHA256','SHA384','SHA512','str','STRAFTER','STRBEFORE','STRDT','STRENDS','STRLANG','STRLEN','STRSTARTS',
        'SUBSTR','SUM','timezone','tz','UCASE','undef','URI','year'
        ),
        /*3 => array(
        'a', 'rdf:type'
        )*/
    ),
    'METHODS' => array(),
    'REGEXPS' => array(
        // subjects
        1 => array(
            GESHI_SEARCH => "($REGEXP_SUBJECT)($REGEXP_PREDICATE)($REGEXP_OBJECT)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => '\\2\\3'
            ),
        // predicates
        2 => array(
            GESHI_SEARCH => "($REGEXP_PREDICATE)($REGEXP_OBJECT)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => '\\2'
            ),
        // objects
        3 => array(
            GESHI_SEARCH => "($REGEXP_OBJECT)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => ''
            ),
        // uris
        5 => array(
            GESHI_SEARCH => "($REGEXP_URIREF)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => ''
            ),
         //6 => 'xsd:\w+',
         7 => 'bif:\w+',
         4 => "((&quot;){1,3}(?:(?!&quot;).)*(&quot;){1,3})", // string literals
         8 => $REGEXP_VAR, // highlight variables with custom color
     
    ),
    'SYMBOLS' => array(
        0 => array(
            '(', ')', '=', '|', ',', '+', '*', '!','&&', '||','{','}', '[', ']'
        )
    ),
    'CASE_SENSITIVE' => array(
        GESHI_COMMENTS => false,
        1 => false,
        2 => true,
        3 => true
    ),
    'STYLES' => array(
        'KEYWORDS' => array(
            1 => 'color: #008000; font-weight: bold;',
            2 => 'color: #008000; font-weight: bold;',
            // 3 => 'color: #226699; font-weight: bold;'
        ),
        'COMMENTS' => array(
            1 => 'color: #408080; font-style: italic;',
            2 => 'color: #408080; font-style: italic;',
            'MULTI' => 'color: #408080; font-style: italic;'
        ),
        'ESCAPE_CHAR' => array(
            0 => 'color: #000099; font-weight: bold;'
        ),
        'BRACKETS' => array(
            0 => 'color: #000000;'
        ),
        'STRINGS' => array(
            0 => 'color: #ff0000;'
        ),
        'NUMBERS' => array(),
        'METHODS' => array(),
        'SYMBOLS' => array(
            0 => 'color: #000000;'
        ),
        'SCRIPT' => array(),
        'REGEXPS' => array(
            1 => 'color: #0000FF; font-weight: bold;',
            2 => 'color: #666666;',
            3 => 'color: #7D9029;',
            4 => 'color: #BA2121;',
            5 => 'color: #0000FF;',
            6 => 'color: #996633;',
            7 => 'color: #996633;',
            8 => 'color: #19177C; font-weight: normal;',
        )
    ),
    'URLS' => array(
        1 => '',
        2 => '',
        3 => ''
    ),
    'OOLANG' => true,
    'OBJECT_SPLITTERS' => array(),
    'STRICT_MODE_APPLIES' => GESHI_NEVER,
    'SCRIPT_DELIMITERS' => array(),
    'HIGHLIGHT_STRICT_BLOCK' => array()
);

?>
