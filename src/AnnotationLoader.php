<?php

namespace VertigoLabs\DoctrineFullTextPostgres;

class AnnotationLoader
{
    /**
     * @const
     */
    const ANNOTATION_NAMESPACE = 'VertigoLabs\\DoctrineFullTextPostgres\\';

    /**
     * @param $class
     *
     * @return mixed
     */
    public function loadClass($class)
    {
        if (strpos($class, self::ANNOTATION_NAMESPACE) === 0) {
            $class = str_replace(self::ANNOTATION_NAMESPACE, '', $class);

            $file = __DIR__ . '/' . str_replace('\\', \DIRECTORY_SEPARATOR, $class) . '.php';
            if (file_exists($file)) {
                require_once $file;

                return true;
            }
        }
    }
}