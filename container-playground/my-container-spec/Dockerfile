FROM python:3.7.5-slim

RUN python -m pip install \
        parse \
        realpython-reader

COPY test.py .
CMD ["python", "test.py"]
